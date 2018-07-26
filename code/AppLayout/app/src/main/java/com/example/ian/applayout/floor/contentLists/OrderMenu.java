package com.example.ian.applayout.floor.contentLists;

import com.example.ian.applayout.MenuGetter;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

/**
 * OrderMenu is the class a helper class to be able to add Menu Items to the UI.
 */
public class OrderMenu {

    /**
     * An array of Menu items.
     */
    public static final List<MenuItem> ITEMS = new ArrayList<MenuItem>();

    /**
     * A map of items, by ID.
     */
    public static final Map<String, MenuItem> ITEM_MAP = new HashMap<String, MenuItem>();

    private static final int COUNT = MenuGetter.menu.size();

    static {
        // Start populating the List with Menu Items.
        for (int i = 0; i <COUNT; i++) {
            addItem(createMenuItem(i));
        }
    }

    //To upload the Menu after sync.
    public static void update(){
        ITEMS.clear();
        for (int i = 0; i <MenuGetter.menu.size(); i++) {
            addItem(createMenuItem(i));
        }
    }

    //Add a Menu Item to the List and the Map
    private static void addItem(MenuItem item) {
        ITEMS.add(item);
        ITEM_MAP.put(item.id, item);
    }

    //Make and format all the contents so it can be made into a Menu Item.
    private static MenuItem createMenuItem(int position) {
        String desc = "Price: \t€" + MenuGetter.menu.get(position).getPrice();
        desc = desc + "\nDescription: \t"+ MenuGetter.menu.get(position).getDescription();
        desc = desc +  "\nCatagory: \t"+MenuGetter.menu.get(position).getCatagory();
        return new MenuItem(String.valueOf(position+1), MenuGetter.menu.get(position).getName(), desc);
    }

    /**
     * A Menu item representing the content and details of a item on a menu.
     */
    public static class MenuItem {
        public final String id;
        public final String content;    //name of menu Item
        public final String details;    //description of menu item

        public MenuItem(String id, String content, String details) {
            this.id = id;
            this.content = content;
            this.details = details;
        }

        @Override
        public String toString() {
            return content;
        }
    }
}
