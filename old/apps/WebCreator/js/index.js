function create() {
    var windowContent = document.getElementById('code').value;
    codeWindow = window.open("", "newwin", "width=500, height=500");
    codeWindow.document.write(windowContent);
    console.log("Compiled.");
}