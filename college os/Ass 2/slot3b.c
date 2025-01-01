#include <stdio.h>
#include <stdlib.h>
#include <limits.h>

typedef struct {
    int pid;
    int arrivalTime;
    int burstTime;
    int remainingBurstTime;
    int waitingTime;
    int turnaroundTime;
    int completionTime;
} Process;

// Function to swap two processes
void swap(Process *a, Process *b) {
    Process temp = *a;
    *a = *b;
    *b = temp;
}

// Function to calculate waiting times, turnaround times, and display the Gantt chart
void calculateTimes(Process processes[], int n, int timeQuantum) {
    int completed = 0, currentTime = 0;
    int totalWaitingTime = 0, totalTurnaroundTime = 0;
    int ganttChart[n * 10]; // Gantt chart array

    printf("\nGantt Chart: ");
    
    // Process queue for Round Robin scheduling
    int queue[n], front = 0, rear = -1;
    for (int i = 0; i < n; i++) {
        queue[++rear] = i;  // Add process to the queue
    }

    while (front <= rear) {
        int currentProcessIdx = queue[front++];
        Process *currentProcess = &processes[currentProcessIdx];

        // Check if process has arrived and is yet to be completed
        if (currentProcess->arrivalTime <= currentTime) {
            if (currentProcess->remainingBurstTime > timeQuantum) {
                // Execute the process for the time quantum
                currentTime += timeQuantum;
                currentProcess->remainingBurstTime -= timeQuantum;
                printf("P%d ", currentProcess->pid);

                // Add process back to the queue if not completed
                if (currentProcess->remainingBurstTime > 0) {
                    queue[++rear] = currentProcessIdx;
                }
            } else {
                // Process completes its execution
                currentTime += currentProcess->remainingBurstTime;
                printf("P%d ", currentProcess->pid);
                currentProcess->completionTime = currentTime;
                currentProcess->turnaroundTime = currentProcess->completionTime - currentProcess->arrivalTime;
                currentProcess->waitingTime = currentProcess->turnaroundTime - currentProcess->burstTime;

                totalWaitingTime += currentProcess->waitingTime;
                totalTurnaroundTime += currentProcess->turnaroundTime;
                currentProcess->remainingBurstTime = 0;
            }
        }
    }

    // Display waiting times and turnaround times
    printf("\n\nProcess-wise Waiting Time and Turnaround Time:\n");
    for (int i = 0; i < n; i++) {
        printf("Process P%d: Waiting Time = %d, Turnaround Time = %d\n", processes[i].pid, processes[i].waitingTime, processes[i].turnaroundTime);
    }

    // Calculate and display average waiting time and turnaround time
    printf("\nAverage Waiting Time = %.2f\n", (float)totalWaitingTime / n);
    printf("Average Turnaround Time = %.2f\n", (float)totalTurnaroundTime / n);
}

int main() {
    int n, timeQuantum;


    printf("Enter number of processes: ");
    scanf("%d", &n);

    // Input the time quantum
    printf("Enter the time quantum: ");
    scanf("%d", &timeQuantum);

    Process processes[n];

    // Input arrival times, burst times for the processes
    for (int i = 0; i < n; i++) {
        printf("Enter arrival time for process %d: ", i + 1);
        scanf("%d", &processes[i].arrivalTime);
        printf("Enter first CPU burst time for process %d: ", i + 1);
        scanf("%d", &processes[i].burstTime);
        processes[i].pid = i + 1;
        processes[i].remainingBurstTime = processes[i].burstTime;
        processes[i].waitingTime = 0;
        processes[i].turnaroundTime = 0;
    }

    // Sorting processes by arrival time
    for (int i = 0; i < n - 1; i++) {
        for (int j = i + 1; j < n; j++) {
            if (processes[i].arrivalTime > processes[j].arrivalTime) {
                swap(&processes[i], &processes[j]);
            }
        }
    }

    // Calculate waiting time, turnaround time, and display Gantt chart
    calculateTimes(processes, n, timeQuantum);

    return 0;
}
