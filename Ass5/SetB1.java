import java.io.*;
import java.util.concurrent.*;

public class SimpleSearchEngine {
    private static final ExecutorService executor = Executors.newFixedThreadPool(5);

    public static void main(String[] args) throws IOException, InterruptedException {
        BufferedReader reader = new BufferedReader(new InputStreamReader(System.in));
        System.out.print("Enter string to search: ");
        String searchString = reader.readLine();

        File folder = new File(".");
        File[] files = folder.listFiles((dir, name) -> name.endsWith(".txt"));

        if (files != null && files.length > 0) {
            for (File file : files) {
                executor.submit(() -> searchInFile(file, searchString));
            }
        }

        executor.shutdown();
        executor.awaitTermination(1, TimeUnit.MINUTES);
        System.out.println("Search completed.");
    }

    private static void searchInFile(File file, String searchString) {
        try (BufferedReader reader = new BufferedReader(new FileReader(file))) {
            String line;
            int lineNumber = 1;
            while ((line = reader.readLine()) != null) {
                if (line.contains(searchString)) {
                    System.out.println("Found in " + file.getName() + " at line " + lineNumber);
                }
                lineNumber++;
            }
        } catch (IOException e) {
            System.err.println("Error reading file: " + file.getName());
        }
    }
}
