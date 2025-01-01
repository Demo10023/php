#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <dirent.h>
#include <sys/stat.h>

// Function to search for patterns in a file
void search_command(char option, const char *filename, const char *pattern) {
    FILE *file = fopen(filename, "r");
    if (file == NULL) {
        perror("Error opening file");
        return;
    }

    char line[1024];
    int count = 0;
    int found = 0;

    while (fgets(line, sizeof(line), file)) {
        char *ptr = line;
        while ((ptr = strstr(ptr, pattern)) != NULL) {
            found = 1;
            count++;
            if (option == 'f') {
                printf("First occurrence: %s", line);
                fclose(file);
                return;
            }
            ptr++;
        }
        if (option == 'a') {
            if (found) {
                printf("%s", line);
            }
        }
    }

    if (option == 'c') {
        printf("Count of pattern occurrences: %d\n", count);
    } else if (!found) {
        printf("Pattern not found\n");
    }

    fclose(file);
}

// Function to display lines of a file
void typeline_command(char option, int n, const char *filename) {
    FILE *file = fopen(filename, "r");
    if (file == NULL) {
        perror("Error opening file");
        return;
    }

    char line[1024];
    char *lines[1000];
    int total_lines = 0;

    while (fgets(line, sizeof(line), file)) {
        lines[total_lines] = strdup(line);
        total_lines++;
    }
    fclose(file);

    if (option == 'a') {
        for (int i = 0; i < total_lines; i++) {
            printf("%s", lines[i]);
        }
    } else if (option == 'n') {
        for (int i = 0; i < n && i < total_lines; i++) {
            printf("%s", lines[i]);
        }
    } else if (option == '-') {
        for (int i = total_lines - n; i < total_lines; i++) {
            if (i >= 0) {
                printf("%s", lines[i]);
            }
        }
    }

    // Free dynamically allocated memory
    for (int i = 0; i < total_lines; i++) {
        free(lines[i]);
    }
}

// Function to list directory contents
void list_command(char option, const char *dirname) {
    struct dirent *entry;
    struct stat file_stat;
    int count = 0;

    DIR *dir = opendir(dirname);
    if (dir == NULL) {
        perror("Error opening directory");
        return;
    }

    while ((entry = readdir(dir)) != NULL) {
        if (option == 'n') {
            printf("%s\n", entry->d_name);
        } else if (option == 'c') {
            count++;
        } else if (option == 'i') {
            stat(entry->d_name, &file_stat);
            printf("%s - Inode: %lu\n", entry->d_name, entry->d_ino);
        }
    }

    if (option == 'c') {
        printf("Total entries: %d\n", count);
    }
    closedir(dir);
}

// Parse and execute the command
void execute_command(char *command) {
    char *args[10];
    int i = 0;
    char *token = strtok(command, " ");
    
    while (token != NULL) {
        args[i++] = token;
        token = strtok(NULL, " ");
    }
    args[i] = NULL;

    if (args[0] == NULL) {
        return;
    }

    if (strcmp(args[0], "exit") == 0) {
        printf("Exiting myshell...\n");
        exit(0);
    }

    if (strcmp(args[0], "search") == 0 && i == 4) {
        search_command(args[1][0], args[2], args[3]);
    } else if (strcmp(args[0], "typeline") == 0 && i >= 3) {
        if (args[1][0] == 'a') {
            typeline_command('a', 0, args[2]);
        } else if (args[1][0] == '-') {
            typeline_command('-', atoi(args[2]), args[3]);
        } else {
            typeline_command('n', atoi(args[1]), args[2]);
        }
    } else if (strcmp(args[0], "list") == 0 && i == 3) {
        list_command(args[1][0], args[2]);
    } else {
        printf("Invalid command or arguments.\n");
    }
}

int main() {
    char command[100];

    while (1) {
        printf("myshell$ ");
        if (fgets(command, sizeof(command), stdin) == NULL) {
            perror("Error reading input");
            continue;
        }
        
        // Remove newline character from input
        command[strcspn(command, "\n")] = '\0';
        
        execute_command(command);
    }
    return 0;
}
