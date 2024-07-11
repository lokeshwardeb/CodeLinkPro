<script>

var editor = ace.edit("editor");

editor.session.setMode("ace/mode/python");
var editor_code = editor.getValue();
// let editor =document.getElementById("editor")

// editor.getValue(); // or session.getValue

console.log("the get value is =>" + editor.getValue());

// var editor_code_value = document.getElementById("editor_code").value = editor.getValue();
var editor_code_value = document.getElementById("editor_code").value;
editor_code_value =  editor.getValue();
console.log("the editor code value is " + editor_code_value)

document.getElementById("editor_code").value = editor.getValue();


function change_fun(){
    editor.session.on('change', function(delta) {
    // delta.start, delta.end, delta.lines, delta.action
    // var editor_code =document.getElementById("editor_code");

    var editor_code = document.getElementById("editor_code").value;

    console.log('the editor code = ' + editor_code)

    console.log(editor_code)

    editor_code = editor.getValue();

    document.getElementById("editor_code").value = editor_code

});
}

change_fun();

var e_inp =document.getElementById("editor_code").value;



console.log("final input ->" + e_inp)

</script>
