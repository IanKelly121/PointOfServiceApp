package com.example.ian.applayout;

/**
 * The Item class is to represent each Menu Item and all it's details.
 */

public class Item {

    private String name;
    private String catagory;
    private String description;
    private String price;
    private int quantity;

    public Item(String name,String catagory,String price){
        this.name = name;
        this.catagory = catagory;
        this.price = price;
        this.quantity = 1;
    }

    public Item(String name,String catagory,String description ,String price){
        this.name = name;
        this.catagory = catagory;
        this.description = description;
        this.price = price;
        this.quantity = 1;
    }

    public String getId(){
        return name+price;
    }

    public String getName(){
        return name;
    }

    public String getDescription(){return description;}

    //This is parse the JSONString price and return it as a double.
    public double getPrice(){
        int cents=0;
        int euros=0;

        for(int i=0; i<price.length(); i++){
            if(price.charAt(i)=='.'){
                cents = Integer.parseInt(price.substring(i+1,i+2));
                euros = Integer.parseInt(price.substring(0,i));
            }
        }

        return (euros+(cents/100))*quantity;
    }

    public String getCatagory(){
        return catagory;
    }

    public int getQuantity(){return quantity;}

    public int incQuantity(){return quantity++;}

    //This will return a string representation of all the Item details.
    public String toString(){
        return "Name: "+name + "\nCatagory: "+catagory +"\nDescription: "+description+"\nPrice: "+price +" Quantity: "+quantity;
    }
}
