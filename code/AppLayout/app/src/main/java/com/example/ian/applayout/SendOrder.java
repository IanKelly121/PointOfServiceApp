package com.example.ian.applayout;

import android.app.Activity;
import android.net.Uri;
import android.os.AsyncTask;
import android.widget.Toast;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;

/**
 * SendOrder is to represent sending an order to the server.
 */

public class SendOrder extends AsyncTask<String, String, String> {

    private HttpURLConnection conn;
    private URL url = null;

    private static final int CONNECTION_TIMEOUT = 10000;
    private static final int READ_TIMEOUT = 15000;
    private Activity mActivity;

    private String username,password,orderNumber,orderDetails,orderPrice;

    public SendOrder(Activity mActivity,String username, String password, String orderNumber, String orderDetails, String orderPrice){
        this.mActivity = mActivity;
        this.username = username;
        this.password = password;
        this.orderNumber = orderNumber;
        this.orderDetails = orderDetails;
        this.orderPrice = orderPrice;
    }

    @Override
    protected String doInBackground(String... params) {
        //attempt authentication against a network service.

        try {
            //Setup HTTPURLConnection class to send & recieve from php & mysql.
            url = new URL("http://order66.finnianoneill.ie/android/recieve_order.php");

            conn = (HttpURLConnection)url.openConnection();
            conn.setReadTimeout(READ_TIMEOUT);
            conn.setConnectTimeout(CONNECTION_TIMEOUT);
            conn.setRequestMethod("POST");

            conn.setDoInput(true);
            conn.setDoOutput(true);

            //Append parameters to URL
            Uri.Builder builder = new Uri.Builder()
                    .appendQueryParameter("username", username)
                    .appendQueryParameter("password", password)
                    .appendQueryParameter("order_number", orderNumber)
                    .appendQueryParameter("order_details",orderDetails)
                    .appendQueryParameter("order_price", orderPrice);

            String query = builder.build().getEncodedQuery();

            //Open Connection for sending data
            OutputStream os = conn.getOutputStream();
            BufferedWriter writer = new BufferedWriter(new OutputStreamWriter(os, "UTF-8"));

            writer.write(query);
            writer.flush();

            writer.close();
            os.close();
            conn.connect();

        } catch (MalformedURLException e) {
            e.printStackTrace();
            return "Exception: Malformed";
        }catch (IOException e){
            e.printStackTrace();
            return "Exception: IOException";
        }

        try{
            int responseCode = conn.getResponseCode();
            if(responseCode == HttpURLConnection.HTTP_OK){
                //Read data from Server
                InputStream input = conn.getInputStream();
                BufferedReader reader = new BufferedReader(new InputStreamReader(input));
                StringBuilder result = new StringBuilder();
                String line;
                while((line = reader.readLine())!=null){
                    result.append(line);
                }
                return (result.toString());
            }else {
                return "Unsuccessful";
            }

        }catch (IOException e){
            e.printStackTrace();
            return "Exception: IOException 2";
        }finally {
            conn.disconnect();
        }
    }

    @Override
    protected void onPostExecute(String result) {
        //Run this method on UI Thread
        if(result.equalsIgnoreCase("sent")){
            Toast.makeText(mActivity, "Order sent!", Toast.LENGTH_LONG).show();
        }else if (result.equalsIgnoreCase("failed")) {
            //If order sending failed, display error message.
            Toast.makeText(mActivity, "Failed to send order", Toast.LENGTH_LONG).show();
        } else{
            Toast.makeText(mActivity, "Oops something went wrong, check your connection!", Toast.LENGTH_LONG).show();
        }
    }
}