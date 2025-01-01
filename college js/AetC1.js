<!DOCTYPE html>
<html>
<head>
    <title>FIFO Queue with JavaScript</title>
    <script>
        let queue = [];

        // Function to add (enqueue) an element to the queue
        function enqueue() {
            let element = document.getElementById('elementInput').value;
            if (element) {
                queue.push(element);
                displayQueue();
                document.getElementById('elementInput').value = '';
            } else {
                alert('Please enter an element!');
            }
        }

        // Function to remove (dequeue) an element from the queue
        function dequeue() {
            if (queue.length > 0) {
                queue.shift();
                displayQueue();
            } else {
                alert('Queue is empty!');
            }
        }

        // Display the current state of the queue
        function displayQueue() {
            document.getElementById('queueDisplay').innerHTML = 
                queue.length > 0 ? queue.join(' → ') : 'Queue is empty';
        }
    </script>
</head>
<body>

    <h1>FIFO Queue Implementation</h1>
    
    <input type="text" id="elementInput" placeholder="Enter element">
    <button onclick="enqueue()">Enqueue</button>
    <button onclick="dequeue()">Dequeue</button>
    
    <h3>Queue:</h3>
    <div id="queueDisplay">Queue is empty</div>

</body>
</html>
