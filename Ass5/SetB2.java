import javax.swing.*;
import java.awt.*;
import java.awt.event.*;
import java.util.ArrayList;
import java.util.Random;

public class BallAnimation extends JPanel {
    private final ArrayList<Ball> balls = new ArrayList<>();
    private final Random random = new Random();
    
    public BallAnimation() {
        JButton startButton = new JButton("Start");
        startButton.addActionListener(e -> createBall());
        setLayout(new BorderLayout());
        add(startButton, BorderLayout.SOUTH);
        
        Timer timer = new Timer(10, e -> moveBalls());
        timer.start();
    }

    private void createBall() {
        int y = random.nextInt(getHeight() - 30) + 15;
        Ball ball = new Ball(y);
        balls.add(ball);
        new Thread(ball).start();
    }

    private void moveBalls() {
        for (Ball ball : balls) {
            ball.move(getHeight());
        }
        repaint();
    }

    @Override
    protected void paintComponent(Graphics g) {
        super.paintComponent(g);
        for (Ball ball : balls) {
            g.setColor(ball.color);
            g.fillOval(ball.x, ball.y, ball.SIZE, ball.SIZE);
        }
    }

    private class Ball implements Runnable {
        private int y, dy = 2;
        private final int x;
        private final Color color;
        private final int SIZE = 30;

        Ball(int yPosition) {
            this.y = yPosition;
            this.x = random.nextInt(getWidth() - SIZE);
            this.color = new Color(random.nextInt(256), random.nextInt(256), random.nextInt(256));
        }

        public void move(int panelHeight) {
            y += dy;
            if (y <= 0 || y >= panelHeight - SIZE) {
                dy *= -1;
            }
        }

        @Override
        public void run() {
            while (true) {
                try {
                    Thread.sleep(10);
                } catch (InterruptedException e) {
                    Thread.currentThread().interrupt();
                    break;
                }
                move(getHeight());
            }
        }
    }

    public static void main(String[] args) {
        JFrame frame = new JFrame("Ball Animation");
        BallAnimation panel = new BallAnimation();
        frame.add(panel);
        frame.setSize(600, 400);
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        frame.setVisible(true);
    }
}
