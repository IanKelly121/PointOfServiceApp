package com.example.ian.applayout.floor.contentLists;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

/**
 * A helper class to update the UI with table numbers
 */
public class OrderTables {
    /**
     * An array of tables.
     */
    public static final List<ItemTables> ITEMS_TABLES = new ArrayList<ItemTables>();

    /**
     * A map of tables, by ID.
     */
    public static final Map<String, ItemTables> ITEM_MAP_TABLES = new HashMap<String, ItemTables>();

    private static final int COUNT = 25;

    //Intialise the list of tables
    static {
        // Add some items.
        for (int i = 1; i <= COUNT; i++) {
            addItem(createItemTables(i));
        }
    }

    private static void addItem(ItemTables item) {
        ITEMS_TABLES.add(item);
        ITEM_MAP_TABLES.put(item.id, item);
    }

    private static ItemTables createItemTables(int position) {
        return new ItemTables(" ", "Table Number  " + position, makeDetails(position));
    }

    private static String makeDetails(int position) {
        StringBuilder builder = new StringBuilder();
        builder.append("Details about Item: ").append(position);
        for (int i = 0; i < position; i++) {
            builder.append("\nMore details information here.");
        }
        return builder.toString();
    }

    /**
     * A list of table item representing a piece of content.
     */
    public static class ItemTables {
        public final String id;
        public final String content;
        public final String details;

        public ItemTables(String id, String content, String details) {
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
