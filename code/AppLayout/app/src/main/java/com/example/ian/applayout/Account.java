package com.example.ian.applayout;

/**
 * Account class to represent a users account and all their details that will
 * be retrieved from the database.
 */

public class Account {
    private String name;
    private String pps;
    private int tel;
    private String email;
    private int accountType;

    public Account(String name, String pps, int tel, String email, int accountType){
        this.name = name;
        this.pps = pps;
        this.tel = tel;
        this.email = email;
        this.accountType = accountType;
    }

    public int getAccountType(){
        return accountType;
    }
}
