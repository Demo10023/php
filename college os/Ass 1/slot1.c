#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>
#include <sys/wait.h>

// Function to count characters, words, or lines in a file
void count_command(char option, const char *filename) {
    FILE *file = fopen(filename, "r");
    if (file == NULL) {
        perror("Error opening file");
        return;
    }

    int character_count = 0, word_count = 0, line_count = 0;
    char ch;
    int in_word = 0;

    while ((ch = fgetc(file)) != EOF) {
        character_count++;

        if (ch == '\n') {
            line_count++;
        }
        if (ch == ' ' || ch == '\n' || ch == '\t') {
            in_word = 0;
        } else if (in_word == 0) {
            in_word = 1;
            word_count++;
        }
    }
    fclose(file);

    switch (option) {
        case 'c':
            printf("Character Count: %d\n", character_count);
            break;
        case 'w':
            printf("Word Count: %d\n", word_count);
            break;
        case 'l':
            printf("Line Count: %d\n", line_count);
            break;
        default:
            printf("Invalid option. Use 'c' for characters, 'w' for words, 'l' for lines.\n");
    }
}

// Execute external shell commands
void execute_external_command(char **args) {
    pid_t pid = fork();
    if (pid == 0) {
        // Child process
        if (execvp(args[0], args) == -1) {
            perror("Error executing command");
        }
        exit(EXIT_FAILURE);
    } else if (pid > 0) {
        // Parent process
        wait(NULL);
    } else {
        perror("Fork failed");
    }
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

    if (strcmp(args[0], "count") == 0 && i == 3) {
        count_command(args[1][0], args[2]);
    } else {
        execute_external_command(args);
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
