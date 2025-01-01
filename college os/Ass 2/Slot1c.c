#include <stdio.h>
#include <stdlib.h>

typedef struct {
    int pid;
    int arrivalTime;
    int burstTime;
    int remainingBurstTime;
    int waitingTime;
    int turnaroundTime;
} Process;

void swap(Process *a, Process *b) {
    Process temp = *a;
    *a = *b;
    *b = temp;
}

void calculateTimes(Process processes[], int n) {
    int completed = 0, currentTime = 0;
    int totalWaitingTime = 0, totalTurnaroundTime = 0;

    printf("\nGantt Chart: ");
    while (completed < n) {
        Process *shortestJob = NULL;
        
        // Find the process with the shortest burst time that is ready to execute
        for (int i = 0; i < n; i++) {
            if (processes[i].arrivalTime <= currentTime && processes[i].remainingBurstTime > 0) {
                if (shortestJob == NULL || processes[i].remainingBurstTime < shortestJob->remainingBurstTime) {
                    shortestJob = &processes[i];
                }
            }
        }

        // If no process is ready to execute, just move time forward
        if (shortestJob == NULL) {
            currentTime++;
            continue;
        }

        // Execute the shortest job
        printf("P%d ", shortestJob->pid);
        currentTime += shortestJob->burstTime;
        shortestJob->remainingBurstTime = 0;
        shortestJob->turnaroundTime = currentTime - shortestJob->arrivalTime;
        shortestJob->waitingTime = shortestJob->turnaroundTime - shortestJob->burstTime;

        totalWaitingTime += shortestJob->waitingTime;
        totalTurnaroundTime += shortestJob->turnaroundTime;
        completed++;
    }

    printf("\n\nProcess-wise Waiting Time and Turnaround Time:\n");
    for (int i = 0; i < n; i++) {
        printf("Process P%d: Waiting Time = %d, Turnaround Time = %d\n", processes[i].pid, processes[i].waitingTime, processes[i].turnaroundTime);
    }

    // Calculate and display average waiting time and turnaround time
    printf("\nAverage Waiting Time = %.2f\n", (float)totalWaitingTime / n);
    printf("Average Turnaround Time = %.2f\n", (float)totalTurnaroundTime / n);
}

int main() {
    int n;

    // Input the number of processes
    printf("Enter number of processes: ");
    scanf("%d", &n);

    Process processes[n];

    // Input arrival times and burst times for the processes
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

    // Calculate waiting time, turnaround time and display Gantt chart
    calculateTimes(processes, n);

    return 0;
}
