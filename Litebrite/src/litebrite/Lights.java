/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package litebrite;

import java.awt.*;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import java.util.ArrayList;
import javax.swing.*;

/**
 *
 * @author Aviva
 */
public class Lights extends JLabel {

    private int colorCounter;

    public Lights() {
        setBorder(BorderFactory.createLineBorder(Color.BLACK, 1));
        ArrayList<Color> colors = new ArrayList();
        addMouseListener(new MouseAdapter() {

            public void mouseClicked(MouseEvent e) {
                setOpaque(true);
                setBackground(colors.get(colorCounter++));
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
        colors.add(Color.white);
        colors.add(Color.BLACK);
        colors.add(null);
    }

}
