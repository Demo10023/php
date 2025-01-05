#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>
#include <sys/types.h>
#include <sys/wait.h>

#define MAX_LINE 1024

void count_file(char option, char *filename)
{
    FILE *fp = fopen(filename,"r");

    if(fp==NULL)
    {
        perror("File not Found !");
        return;
    }

    int count = 0;
    char ch;

    switch(option) 
    {
    case 'c':
        while((ch =fgetc(fp)) != EOF)
        {
            count++;
        }
        break;

    case 'w':
        while(fscanf(fp,"%*s") != EOF)
        {
            count++;
        }
        break;

    case 'l':
        while((ch=fgetc(fp)) != EOF)
        {
            if(ch=='\n')
            {
                count++;
            }
        }
        break;

    default :
        perror("Invalid Command for Count !");
        fclose(fp);
        return;
    }

    printf("Count : %d\n",count);
    fclose(fp);
}

void execute_command(char *command) 
{
    char *tokens[MAX_LINE/2 + 1];
    char *token = strtok(command, " ");
    int i=0;

    while(token != NULL)
    {
        tokens[i++] = token;
        token = strtok(NULL, " ");
    }

    tokens[i] = NULL;

    if(i==0) 
    {
        return;
    }

    if(strcmp(tokens[0],"count") == 0 && i==3)
    {
        //tokens[1][0] extracts the first character from the string stored in tokens[1]
        count_file(tokens[1][0],tokens[2]);
        
    }
    else if(strcmp(tokens[0],"q")==0)
    {
        exit(0);
    }
    else
    {
        pid_t pid = fork();

        if(pid == 0) //child process
        {
            execvp(tokens[0], tokens);
            perror("Command not found");
            exit(1);

        }
        else if(pid>0) //parent process
        {
            wait(NULL);
        }
        else //fork failled
        {
            perror("Fork Failled !");
        }

    }

}

int main() 
{
    char command[MAX_LINE];

    while(1) 
    {
        printf("myshell$ ");

        if(fgets(command,MAX_LINE,stdin)== NULL) 
        {
            exit(0);
        } 
        else 
        {
            command[strcspn(command, "\n")] = 0;
            execute_command(command);
        }
    }
    return 0;
}
