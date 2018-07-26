package com.example.ian.applayout;

import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;
import java.util.GregorianCalendar;
import java.util.HashSet;
import java.util.Set;

/**
 * The Order class is to represent an Order which is made up of
 * a ArrayList of Items.
 */

public class Order extends ArrayList<Item>{
    private ArrayList<Item> orderItems;
    private String orderNumber;
    private String orderDetails;
    private String orderPrice;
    private String orderStatus;

    public Order(){}

    public Order(ArrayList<Item> orderItems,String price,String orderStatus){
        this.orderItems = orderItems;
        this.orderNumber = new SimpleDateFormat("ddMMyyyyhhmmss").format(new Date());
        this.orderDetails = getOrderDetails(orderItems);
        this.orderPrice = price;
        this.orderStatus = orderStatus;
    }

    public Order(String orderNumber,String orderDetails,String orderPrice,String orderStatus){
        this.orderDetails = orderDetails;
        this.orderNumber = orderNumber;
        this.orderPrice = orderPrice;
        this.orderStatus = orderStatus;
        this.orderItems = getItemsFromDetails(orderDetails);
    }

    public String getOrderNumber(){return orderNumber;}

    public String getOrderDetails(){return orderDetails;}

    public String getOrderPrice(){return orderPrice;}

    public String getOrderStatus(){return orderStatus;}

    //Prints a string representation of an order, accounting for quantities.
    public String getOrderDetails(ArrayList<Item> items){
        String detailsToString="";

        Set<Item> setOrderItems = new HashSet<>();
        for(Item each: items){      //remove duplicates and increase quanity of item instead.
            if(!setOrderItems.add(each)){
                setOrderItems.remove(each);
                each.incQuantity();
                setOrderItems.add(each);
            }
        }

        for(Item each: setOrderItems){
            detailsToString = "x"+each.getQuantity()+" "+each.getName()+"\n"+detailsToString;
        }

        return detailsToString;
    }

    public double getOrderTotal(){
        double sum = 0;
        for(Item itemToAdd : orderItems){
            sum = sum + itemToAdd.getPrice();
        }
        return sum;
    }

    public ArrayList<Item> getItemsFromDetails(String order){
        ArrayList<Item> updatedItems = new ArrayList<>();

        return updatedItems;
    }

    public String toString(){return orderDetails;}
}