
    var editor = ace.edit("editor");
    // editor.setTheme("ace/theme/monokai");
    editor.setTheme("ace/theme/cobalt");
    // editor.session.setMode("ace/mode/python");
    // editor.session.setMode("ace/mode/javascript");

    // editor.session.setTabSize(24);


     // Enable snippets
     editor.setOptions({
        enableSnippets: true,
        enableBasicAutocompletion: true,
        enableLiveAutocompletion: true
    });

    // // Define snippets
    // var snippetManager = ace.require("ace/snippets").snippetManager;
    // var customSnippets = {
    //     "python": [
    //         "snippet def\n\tdef ${1:function_name}(${2:arguments}):\n\t\t${3:// body}\n\t\t${4:return something}\n"
    //     ],
    //     "c_cpp": [
    //         "snippet for\n\tfor (${1:int i = 0}; ${2:i < count}; ${3:++i}) {\n\t\t${4:// code}\n\t}\n"
    //     ],
    //     "java": [
    //         "snippet main\n\tpublic static void main(String[] args) {\n\t\t${1:// code}\n\t}\n"
    //     ],
    //     "php": [
    //         "snippet foreach\n\tforeach (${1:$array} as ${2:$key => $value}) {\n\t\t${3:// code}\n\t}\n"
    //     ]
    // };

    // // Add snippets to the snippet manager
    // Object.keys(customSnippets).forEach(function(language) {
    //     snippetManager.register(customSnippets[language], language);
    // });







//     <script src=https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/ace.js></script>
// <script src=https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/ext-language_tools.js></script>

// <script>
//   editor = ace.edit()
//   document.body.appendChild(editor.container)
//   editor.container.style.height = '100px'
//   editor.setOptions({
//     enableBasicAutocompletion: true,
//     enableLiveAutocompletion: true,
//     enableSnippets: true,
//   })
//   editor.session.setMode("ace/mode/javascript")
// </script>