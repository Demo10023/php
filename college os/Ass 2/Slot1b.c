#include <stdio.h>
#include <stdlib.h>
#include <time.h>

#define IO_WAIT 2 // Fixed I/O waiting time

// Structure to represent a process
struct Process {
    int pid;            // Process ID
    int arrival_time;   // Arrival time
    int burst_time;     // CPU burst time
    int completion_time;
    int turnaround_time;
    int waiting_time;
};

// Function to swap processes for sorting
void swap(struct Process *a, struct Process *b) {
    struct Process temp = *a;
    *a = *b;
    *b = temp;
}

// Sort processes by arrival time (FCFS order)
void sort_by_arrival(struct Process proc[], int n) {
    for (int i = 0; i < n - 1; i++) {
        for (int j = 0; j < n - i - 1; j++) {
            if (proc[j].arrival_time > proc[j + 1].arrival_time) {
                swap(&proc[j], &proc[j + 1]);
            }
        }
    }
}

// Simulate FCFS scheduling
void fcfs(struct Process proc[], int n) {
    int time = 0;
    float total_waiting_time = 0, total_turnaround_time = 0;

    printf("\nGantt Chart:\n");

    for (int i = 0; i < n; i++) {
        if (time < proc[i].arrival_time) {
            time = proc[i].arrival_time;
        }
        printf("| P%d (%d) ", proc[i].pid, time);

        // Simulate CPU burst and IO wait
        time += proc[i].burst_time;
        proc[i].completion_time = time + IO_WAIT;
        proc[i].turnaround_time = proc[i].completion_time - proc[i].arrival_time;
        proc[i].waiting_time = proc[i].turnaround_time - proc[i].burst_time;

        // Accumulate total waiting and turnaround time
        total_waiting_time += proc[i].waiting_time;
        total_turnaround_time += proc[i].turnaround_time;

        time += IO_WAIT; // Fixed I/O wait after each process
    }

    printf("|\n");
    
    // Display results
    printf("\nProcess	AT	BT	CT	TAT	WT\n");
    for (int i = 0; i < n; i++) {
        printf("P%d\t%d\t%d\t%d\t%d\t%d\n",
               proc[i].pid,
               proc[i].arrival_time,
               proc[i].burst_time,
               proc[i].completion_time,
               proc[i].turnaround_time,
               proc[i].waiting_time);
    }

    printf("\nAverage Turnaround Time: %.2f\n", total_turnaround_time / n);
    printf("Average Waiting Time: %.2f\n", total_waiting_time / n);
}

int main() {
    int n;
    printf("Enter number of processes: ");
    scanf("%d", &n);

    struct Process proc[n];
    srand(time(0)); // Random seed for burst time

    // Input process details
    for (int i = 0; i < n; i++) {
        proc[i].pid = i + 1;
        printf("Enter arrival time for process P%d: ", i + 1);
        scanf("%d", &proc[i].arrival_time);
        proc[i].burst_time = rand() % 10 + 1; // Random burst between 1-10
        printf("Random burst time for P%d: %d\n", i + 1, proc[i].burst_time);
    }

    // Sort processes by arrival time
    sort_by_arrival(proc, n);

    // Execute FCFS scheduling
    fcfs(proc, n);

    return 0;
}
