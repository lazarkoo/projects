/**
 * Adobe Edge: symbol definitions
 */
(function($, Edge, compId){
//images folder
var im='images/';

var fonts = {};    fonts['bad-script, cursive']='<script src=\"http://use.edgefonts.net/bad-script:n4:all.js\"></script>';
    fonts['comfortaa, sans-serif']='<script src=\"http://use.edgefonts.net/comfortaa:n4,n3,n7:all.js\"></script>';

var opts = {
    'gAudioPreloadPreference': 'auto',

    'gVideoPreloadPreference': 'auto'
};
var resources = [
];
var symbols = {
"stage": {
    version: "4.0.0",
    minimumCompatibleVersion: "4.0.0",
    build: "4.0.0.359",
    baseState: "Base State",
    scaleToFit: "none",
    centerStage: "none",
    initialState: "Base State",
    gpuAccelerate: false,
    resizeInstances: false,
    content: {
            dom: [
            {
                id: 'Text',
                type: 'text',
                rect: ['17px', '106px','auto','auto','auto', 'auto'],
                text: "Добро дошли на сајт издавачке делатности",
                font: ['Trebuchet MS, Arial, Helvetica, sans-serif', 15, "rgba(0,0,0,1)", "700", "none", "italic"],
                textShadow: ["rgba(0,0,0,0.65098)", 3, 3, 3]
            },
            {
                id: 'BiankEai8',
                type: 'image',
                rect: ['512px', '0px','106px','100px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"BiankEai8.png",'0px','0px'],
                boxShadow: ["", 0, 0, 0, 0, "rgba(0,0,0,0)"]
            },
            {
                id: 'feather',
                type: 'image',
                rect: ['434px', '85px','36px','31px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",'web-design/feather.png','0px','0px'],
                boxShadow: ["", 0, 0, 0, 0, "rgba(0,0,0,0)"]
            }],
            symbolInstances: [

            ]
        },
    states: {
        "Base State": {
            "${_Stage}": [
                ["color", "background-color", 'rgba(255,255,255,0.05)'],
                ["style", "width", '500px'],
                ["style", "height", '160px'],
                ["style", "overflow", 'hidden']
            ],
            "${_feather}": [
                ["style", "top", '-31px'],
                ["style", "height", '31px'],
                ["style", "left", '467px'],
                ["style", "width", '36px']
            ],
            "${_Text}": [
                ["subproperty", "textShadow.blur", '15px'],
                ["subproperty", "textShadow.offsetH", '6px'],
                ["style", "font-weight", '700'],
                ["style", "left", '-343px'],
                ["style", "font-size", '15px'],
                ["style", "top", '68px'],
                ["subproperty", "textShadow.color", 'rgba(64,164,169,0.50)'],
                ["style", "font-style", 'italic'],
                ["style", "font-family", 'Trebuchet MS, Arial, Helvetica, sans-serif'],
                ["style", "text-decoration", 'none'],
                ["subproperty", "textShadow.offsetV", '6px']
            ],
            "${_BiankEai8}": [
                ["style", "top", '0px'],
                ["style", "height", '100px'],
                ["style", "left", '512px'],
                ["style", "width", '106px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 6374,
            autoPlay: true,
            timeline: [
                { id: "eid35", tween: [ "style", "${_BiankEai8}", "left", '384px', { fromValue: '512px'}], position: 0, duration: 2500, easing: "easeInOutQuad" },
                { id: "eid32", tween: [ "style", "${_feather}", "top", '57px', { fromValue: '-31px'}], position: 2500, duration: 874, easing: "swing" },
                { id: "eid31", tween: [ "style", "${_feather}", "left", '446px', { fromValue: '467px'}], position: 2500, duration: 874, easing: "swing" },
                { id: "eid37", tween: [ "style", "${_Text}", "left", '20px', { fromValue: '-343px'}], position: 3374, duration: 3000 },
                { id: "eid36", tween: [ "style", "${_BiankEai8}", "top", '38px', { fromValue: '0px'}], position: 0, duration: 2500, easing: "easeInOutQuad" }            ]
        }
    }
}
};


Edge.registerCompositionDefn(compId, symbols, fonts, resources, opts);

/**
 * Adobe Edge DOM Ready Event Handler
 */
$(window).ready(function() {
     Edge.launchComposition(compId);
});
})(jQuery, AdobeEdge, "EDGE-242535258");
