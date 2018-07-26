package com.example.ian.applayout;

import android.app.Activity;
import android.net.Uri;
import android.os.AsyncTask;
import android.widget.Toast;

import com.example.ian.applayout.floor.contentLists.OrderReceived;

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
 * UpdateOrderStatus class is to update the staus of an order to CLOSED.
 */

public class UpdateOrderStatus extends AsyncTask<String, String ,String> {

    private final String mUsername;
    private final String mPassword;
    private final String orderNumber;
    private final int orderPosition;
    private Activity mActivity;

    private HttpURLConnection conn;
    private URL url = null;

    private static final int CONNECTION_TIMEOUT = 10000;
    private static final int READ_TIMEOUT = 15000;

    public UpdateOrderStatus(String username, String password, String orderNumber,int orderPosition ,Activity mActivity) {
        this.mUsername = username;
        this.mPassword = password;
        this. orderNumber = orderNumber;
        this.orderPosition = orderPosition;
        this.mActivity = mActivity;
    }

    @Override
    protected String doInBackground(String... params) {
        // attempt authentication against a network service.

        try {
            //Setup HTTPURLConnection class to send & recieve from php & mysql.
            url = new URL("http://order66.finnianoneill.ie/android/updateOrderStatus.php");

            conn = (HttpURLConnection)url.openConnection();
            conn.setReadTimeout(READ_TIMEOUT);
            conn.setConnectTimeout(CONNECTION_TIMEOUT);
            conn.setRequestMethod("POST");

            conn.setDoInput(true);
            conn.setDoOutput(true);

            //Append parameters to URL
            Uri.Builder builder = new Uri.Builder()
                    .appendQueryParameter("username", mUsername)
                    .appendQueryParameter("password", mPassword)
                    .appendQueryParameter("orderNumber", orderNumber);

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
        if(result.equalsIgnoreCase("updated")){
            //Remove order from list.
            OrderReceived.ITEMS_RECEIVED.remove(orderPosition);
        }else if (result.equalsIgnoreCase("failed")) {
            //If order sending failed, display error message.
            Toast.makeText(mActivity, "Failed to remove order", Toast.LENGTH_LONG).show();
        } else{
            Toast.makeText(mActivity, "Oops something went wrong, check your connection!", Toast.LENGTH_LONG).show();
        }
    }

}