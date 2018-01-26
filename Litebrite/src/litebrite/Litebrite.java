/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package litebrite;

import java.awt.GridLayout;
import java.awt.*;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import java.util.ArrayList;
import javax.swing.*;

/**
 *
 * @author Aviva
 */
//use JFrame to get the game board
public class Litebrite extends JFrame {

    //create the board in the constructor
    public Litebrite() {
        setLayout(new GridLayout(40, 40));
        for (int i = 0; i < 1600; i++) {
            //put a light into each box in the grid
            add(new Lights());
        }
        //emd the program when exit
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        //size of the window
        setSize(700, 700);
        //show the window
        setVisible(true);
    }

    public class Lights extends JLabel {
        //counter to keep track of what color the box light is up to
        private int colorCounter;

        public Lights() {
            //make a black border around the light
            setBorder(BorderFactory.createLineBorder(Color.BLACK, 1));
            // make the array of colors
            ArrayList<Color> colors = new ArrayList();
          
            addMouseListener(new MouseAdapter() {
                public void mouseClicked(MouseEvent e) {
                    //on click change the color to the one its up to.
                    setOpaque(true);
                    setBackground(colors.get(colorCounter++));
                    // if we are up to the last color go back to the first
                    if (colorCounter == colors.size()) {
                        colorCounter = 0;
                    }
                }

            });

            colors.add(Color.red);
            colors.add(Color.CYAN);
            colors.add(Color.GREEN);
            colors.add(Color.BLUE);
            colors.add(Color.GRAY);
            colors.add(Color.ORANGE);
            colors.add(Color.YELLOW);
            colors.add(Color.BLACK);
            colors.add(null);
        }
    }
    
     /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        //start the game
        new Litebrite();
    }

}
