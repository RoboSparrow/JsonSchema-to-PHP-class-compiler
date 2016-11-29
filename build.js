/* jshint node:true, esversion:6 */
'use strict';

const fs = require('fs');
const path = require('path');

// 1. Make a skeleton:
let result = {
    '$schema': "http://json-schema.org/draft-04/schema#",
    type: "object",
    properties: {},
    additionalProperties: false,
    definitions: {}
};

const TINCAN_DIR = 'TinCanSchema/1.0.1';
const COMPILED_DIR = 'compiled';

//// fn

let handleFormat = (obj) => {
    let type = Object.prototype.toString.call(obj);

    switch(type){
        case '[object Array]':

            for(let i = 0; i < obj.length; i++){
                handleFormat(obj[i]);
            }
        break;
        case '[object Object]':

            if(typeof obj.format !== 'undefined'){
                let _format = obj.format;
                delete obj.format;
                if(typeof obj.allOf === 'undefined'){
                    obj.allOf = [];
                }
                obj.allOf.push({'$ref': '#/definitions/'._format});
            }

            for(let key in obj){
                handleFormat(obj[key]);
            }
        break;
    }

};

let compile = (fname) => {

    let stringData;
    let data;
    let id;

    // a. Parse it to an object and verify that it is valid JSON

    stringData = fs.readFileSync(path.resolve(TINCAN_DIR + '/' + fname));
    data = JSON.parse(stringData);

    // b. Check that the file name matches the id:
    if ("#" + fname.split('.')[0] !== data.id) {
        // handle the error
    }

    // d. Remove the "$schema" field from the data, if present:
    if (data["$schema"]) {      // jshint ignore:line
        delete data["$schema"]; // jshint ignore:line
    }                           // jshint ignore:line

    // e. Add the data to the "properties" field of the skeleton:
    id = data.id.slice(1);  // slice off the '#' prefix
    result.properties[id] = data;

};


let makePHP = (json, template) => {
    template = template || '';
    //console.log(json.match(/\s"\$.+?"\:/g));process.exit();

    json = json.replace(/"\: /g, '" => ');// ":
    json = json.replace(/\{/g, '['); // object start
    json = json.replace(/\}/g, ']'); // object end

    json = json.replace(/\s\s"\$/g, '"\\$'); //$ref

    //json = json.replace(/\\\\/g, '\\'); // regex inner
    //json = json.replace(/@@replace@@/g, "\\'"); // object end
    if(template){
        return template.replace(/@@SCHEMA_VALUES@@/, json);
    }

    let php = '<?php \n\n // auto-generated TinCan Schema \n\n$schema = ';
    return php + json + ';' ;
};

//// contoller

// read schma files
let files = fs.readdirSync(TINCAN_DIR).filter(function(file){//console.log(file);
    return file.substr(-5) === '.json';

});

// read and parse formats
let formats = {};
let formatFile = fs.readFileSync(path.resolve(TINCAN_DIR + '/formats/formats.json'));
let _formats = JSON.parse(formatFile);
for(let key in _formats){
    formats[key] = {
        type: 'string',
        pattern: _formats[key]
    };
}

// compile result
for (var i = 0; i < files.length; i++) {
    compile(files[i]);
}

handleFormat(result.properties);
result.definitions = formats;

let json = JSON.stringify(result, null, 4);
let jsonFile = COMPILED_DIR + '/JsonSchema.json';
fs.writeFileSync(path.resolve(jsonFile), json);
console.log(' * JSON compiled: ./' + jsonFile);

let template = fs.readFileSync(path.resolve('./template.php'), 'utf8');
let phpcode = makePHP(json, template);

let phpFile = COMPILED_DIR + '/JsonSchema.php';
fs.writeFileSync(path.resolve(phpFile), phpcode);
console.log(' * PHP compiled: ./' + phpFile);
