import java.util.Random;

public class SumAverageMultiThreaded {
    private static final int SIZE = 1000;
    private static final int THREAD_COUNT = 10;
    private static int[] numbers = new int[SIZE];
    private static int[] partialSums = new int[THREAD_COUNT];

    public static void main(String[] args) throws InterruptedException {
        Random random = new Random();

        // Generate random numbers
        for (int i = 0; i < SIZE; i++) {
            numbers[i] = random.nextInt(100) + 1; // Random number between 1 and 100
        }

        // Create and start threads
        Thread[] threads = new Thread[THREAD_COUNT];
        for (int i = 0; i < THREAD_COUNT; i++) {
            final int threadIndex = i;
            threads[i] = new Thread(() -> calculatePartialSum(threadIndex));
            threads[i].start();
        }

        // Join threads
        for (Thread thread : threads) {
            thread.join();
        }

        // Calculate total sum and average
        int totalSum = 0;
        for (int sum : partialSums) {
            totalSum += sum;
        }
        double average = (double) totalSum / SIZE;

        System.out.println("Total Sum: " + totalSum);
        System.out.println("Average: " + average);
    }

    private static void calculatePartialSum(int threadIndex) {
        int start = threadIndex * (SIZE / THREAD_COUNT);
        int end = start + (SIZE / THREAD_COUNT);
        int sum = 0;
        
        for (int i = start; i < end; i++) {
            sum += numbers[i];
        }

        partialSums[threadIndex] = sum;
    }
}
