<!DOCTYPE html>
<html>
<head>
    <title>Student Name Validation</title>
    <style>
        #studentName {
            font-size: 16px;
        }
        #responseImage {
            display: none;
            width: 150px;
            height: 150px;
            transition: all 0.3s ease;
        }
    </style>
    <script>
        function validateName() {
            let name = document.getElementById('studentName').value;
            let image = document.getElementById('responseImage');
            
            if (name.trim() !== '') {
                let textBox = document.getElementById('studentName');
                textBox.style.color = 'red';
                textBox.style.fontSize = '18px';
            } else {
                image.style.display = 'block';
            }
        }

        function enlargeImage() {
            let image = document.getElementById('responseImage');
            image.style.width = '250px';
            image.style.height = '250px';
        }

        function shrinkImage() {
            let image = document.getElementById('responseImage');
            image.style.width = '150px';
            image.style.height = '150px';
        }

        function hideImage() {
            let image = document.getElementById('responseImage');
            image.style.display = 'none';
        }
    </script>
</head>
<body onload="hideImage()">

    <h1>Enter Student Name</h1>
    <input type="text" id="studentName" placeholder="Enter name" 
           onblur="validateName()" 
           onmouseup="shrinkImage()" 
           onmouseover="enlargeImage()">

    <img id="responseImage" src="https://via.placeholder.com/150" 
         alt="Response Image" 
         onclick="shrinkImage()" 
         onmouseover="enlargeImage()">

</body>
</html>
