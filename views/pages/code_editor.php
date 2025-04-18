<!DOCTYPE html>
<html lang="en">
<head>
<title>ACE in Action</title>
<style type="text/css" media="screen">
    #editor { 
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }
</style>
</head>
<body>

<div id="editor">function foo(items) {
    var x = "All this is syntax highlighted";
    return x;
}</div>
    
<!-- <script src="/ace-builds/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.9.4/ace.js" integrity="sha512-X+Op19uVlYfk3rjBDwbgOu+/bFz8RWoZG1Ch73+IUAkORNOKWcOOmUWicByeZH71mvYJ/7onbF5YJRrATrbyFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.session.setMode("ace/mode/javascript");
</script>
</body>
</html>