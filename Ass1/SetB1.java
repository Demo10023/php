

import javax.swing.*;
import java.awt.*;
import java.awt.event.*;
import java.util.HashMap;

public class SetB1 {
    private HashMap<String, String> cityCodes = new HashMap<>();
    private JFrame frame;
    private JTextField cityField, codeField, searchField;
    private JTextArea displayArea;

    public SetB1() {
        frame = new JFrame("City STD Code Manager");
        frame.setLayout(new GridLayout(5, 2));
        frame.setSize(500, 300);
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);

        JLabel cityLabel = new JLabel("City Name:");
        cityField = new JTextField();

        JLabel codeLabel = new JLabel("STD Code:");
        codeField = new JTextField();

        JButton addButton = new JButton("Add City");
        JButton removeButton = new JButton("Remove City");
        JButton searchButton = new JButton("Search City");

        JLabel searchLabel = new JLabel("Search City:");
        searchField = new JTextField();

        displayArea = new JTextArea();
        displayArea.setEditable(false);

        addButton.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                addCity();
            }
        });

        removeButton.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                removeCity();
            }
        });

        searchButton.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                searchCity();
            }
        });

        frame.add(cityLabel);
        frame.add(cityField);
        frame.add(codeLabel);
        frame.add(codeField);
        frame.add(addButton);
        frame.add(removeButton);
        frame.add(searchLabel);
        frame.add(searchField);
        frame.add(searchButton);
        frame.add(new JScrollPane(displayArea));

        frame.setVisible(true);
    }

    private void addCity() {
        String city = cityField.getText().trim();
        String code = codeField.getText().trim();
        if (!city.isEmpty() && !code.isEmpty()) {
            if (cityCodes.containsKey(city)) {
                displayArea.setText("City already exists.");
            } else {
                cityCodes.put(city, code);
                displayArea.setText("City added successfully!");
            }
        } else {
            displayArea.setText("Please enter city and code.");
        }
    }

    private void removeCity() {
        String city = cityField.getText().trim();
        if (cityCodes.containsKey(city)) {
            cityCodes.remove(city);
            displayArea.setText("City removed successfully!");
        } else {
            displayArea.setText("City not found.");
        }
    }

    private void searchCity() {
        String city = searchField.getText().trim();
        if (cityCodes.containsKey(city)) {
            displayArea.setText("STD Code for " + city + ": " + cityCodes.get(city));
        } else {
            displayArea.setText("City not found.");
        }
    }

    public static void main(String[] args) {
        new SetB1();
    }
}

