<!DOCTYPE html>
<html>
<head>
    <title>Text Formatting with JavaScript</title>
    <style>
        #formattedText {
            font-size: 20px;
            margin-top: 20px;
        }
        button {
            margin: 5px;
        }
    </style>
    <script>
        function applyStyle(style) {
            let text = document.getElementById('textInput').value;
            let output = document.getElementById('formattedText');

            switch (style) {
                case 'bold':
                    output.innerHTML = `<b>${text}</b>`;
                    break;
                case 'italic':
                    output.innerHTML = `<i>${text}</i>`;
                    break;
                case 'underline':
                    output.innerHTML = `<u>${text}</u>`;
                    break;
                case 'strikethrough':
                    output.innerHTML = `<s>${text}</s>`;
                    break;
                case 'hyperlink':
                    output.innerHTML = `<a href="#">${text}</a>`;
                    break;
                default:
                    output.innerHTML = text;
            }
        }
    </script>
</head>
<body>

    <h1>Text Formatter</h1>
    <input type="text" id="textInput" placeholder="Enter your text here">
    <div>
        <button onclick="applyStyle('bold')">Bold</button>
        <button onclick="applyStyle('italic')">Italic</button>
        <button onclick="applyStyle('underline')">Underline</button>
        <button onclick="applyStyle('strikethrough')">Strikethrough</button>
        <button onclick="applyStyle('hyperlink')">Hyperlink</button>
    </div>
    <div id="formattedText"></div>

</body>
</html>
