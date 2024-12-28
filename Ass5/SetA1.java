class MessageThread extends Thread {
    private String message;

    // Constructor to pass message
    public MessageThread(String message) {
        this.message = message;
    }

    @Override
    public void run() {
        while (true) {
            System.out.println(Thread.currentThread().getName() + ": " + message);
            try {
                Thread.sleep(1000);  // Pause for 1 second
            } catch (InterruptedException e) {
                System.out.println(Thread.currentThread().getName() + " interrupted.");
                break;
            }
        }
    }
}

public class MultiThreadMessage {
    public static void main(String[] args) {
        // Create two threads with different messages
        MessageThread thread1 = new MessageThread("Hello from Thread 1!");
        MessageThread thread2 = new MessageThread("Greetings from Thread 2!");

        // Start the threads
        thread1.start();
        thread2.start();

        // Display thread information continuously
        while (true) {
            System.out.println("Running threads: ");
            System.out.println(thread1.getName() + " (State: " + thread1.getState() + ")");
            System.out.println(thread2.getName() + " (State: " + thread2.getState() + ")");
            try {
                Thread.sleep(2000);  // Check every 2 seconds
            } catch (InterruptedException e) {
                System.out.println("Main thread interrupted.");
                break;
            }
        }
    }
}
