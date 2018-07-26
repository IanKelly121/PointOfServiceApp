package com.example.ian.applayout;

import android.net.Uri;
import android.os.AsyncTask;

import com.example.ian.applayout.floor.contentLists.OrderReceived;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

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
import java.util.ArrayList;

/**
 * RecieveOrders class is to represent receiving incoming orders.
 */

public class RecieveOrders extends AsyncTask<String, String ,String>{

    private final String mUsername;
    private final String mPassword;
    public static ArrayList<Order> orderList;

    private HttpURLConnection conn;
    private URL url = null;

    private static final int CONNECTION_TIMEOUT = 10000;
    private static final int READ_TIMEOUT = 15000;

    public RecieveOrders(String username, String password) {
        mUsername = username;
        mPassword = password;
    }

    @Override
    protected String doInBackground(String... params) {
        // attempt authentication against a network service.

        try {
            //Setup HTTPURLConnection class to send & recieve from php & mysql.
            url = new URL("http://order66.finnianoneill.ie/android/checkOrders.php");

            conn = (HttpURLConnection)url.openConnection();
            conn.setReadTimeout(READ_TIMEOUT);
            conn.setConnectTimeout(CONNECTION_TIMEOUT);
            conn.setRequestMethod("POST");

            conn.setDoInput(true);
            conn.setDoOutput(true);

            //Append parameters to URL
            Uri.Builder builder = new Uri.Builder()
                    .appendQueryParameter("username", mUsername)
                    .appendQueryParameter("password", mPassword);

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
        orderList = new ArrayList<Order>();
        try{
            //Take in the incoming List of Items and add them into an order
            JSONArray jArray = new JSONArray(result);
            for(int i=0; i<jArray.length(); i++){
                JSONObject jObject = jArray.getJSONObject(i);
                String orderNumber = jObject.get("order_number").toString();
                String orderDetails = jObject.get("order_details").toString();
                String orderPrice = jObject.get("order_price").toString();
                String orderStatus = jObject.get("order_status").toString();
                orderList.add(new Order(orderNumber,orderDetails,orderPrice,orderStatus));
            }
            new OrderReceived().update();
        }catch (JSONException e){
            e.printStackTrace();
        }
    }

}
