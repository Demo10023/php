#include <stdio.h>
#include <stdlib.h>
#include <limits.h>

typedef struct {
    int pid;
    int arrivalTime;
    int burstTime;
    int remainingBurstTime;
    int priority;
    int waitingTime;
    int turnaroundTime;
} Process;

// Function to swap two processes
void swap(Process *a, Process *b) {
    Process temp = *a;
    *a = *b;
    *b = temp;
}

// Function to calculate waiting times, turnaround times and display the Gantt chart
void calculateTimes(Process processes[], int n) {
    int completed = 0, currentTime = 0;
    int totalWaitingTime = 0, totalTurnaroundTime = 0;

    printf("\nGantt Chart: ");
    
    // Loop until all processes are completed
    while (completed < n) {
        // Find the process with the highest priority (lowest priority value) that is ready to execute
        int highestPriorityIdx = -1;
        int minPriority = INT_MAX;
        for (int i = 0; i < n; i++) {
            if (processes[i].arrivalTime <= currentTime && processes[i].remainingBurstTime > 0) {
                if (processes[i].priority < minPriority) {
                    minPriority = processes[i].priority;
                    highestPriorityIdx = i;
                }
            }
        }

        // If no process is ready to execute, just move time forward
        if (highestPriorityIdx == -1) {
            currentTime++;
            continue;
        }

        // Execute the process for 1 time unit (Preemptive)
        printf("P%d ", processes[highestPriorityIdx].pid);
        processes[highestPriorityIdx].remainingBurstTime--;

        // If the process is completed, calculate its turnaround and waiting time
        if (processes[highestPriorityIdx].remainingBurstTime == 0) {
            completed++;
            processes[highestPriorityIdx].turnaroundTime = currentTime + 1 - processes[highestPriorityIdx].arrivalTime;
            processes[highestPriorityIdx].waitingTime = processes[highestPriorityIdx].turnaroundTime - processes[highestPriorityIdx].burstTime;

            totalWaitingTime += processes[highestPriorityIdx].waitingTime;
            totalTurnaroundTime += processes[highestPriorityIdx].turnaroundTime;
        }

        // Increment current time
        currentTime++;
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
    int n;

    // Input the number of processes
    printf("Enter number of processes: ");
    scanf("%d", &n);

    Process processes[n];

    // Input arrival times, burst times, and priorities for the processes
    for (int i = 0; i < n; i++) {
        printf("Enter arrival time for process %d: ", i + 1);
        scanf("%d", &processes[i].arrivalTime);
        printf("Enter first CPU burst time for process %d: ", i + 1);
        scanf("%d", &processes[i].burstTime);
        printf("Enter priority for process %d (lower value means higher priority): ", i + 1);
        scanf("%d", &processes[i].priority);
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
    calculateTimes(processes, n);

    return 0;
}
