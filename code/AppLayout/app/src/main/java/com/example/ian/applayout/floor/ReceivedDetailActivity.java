package com.example.ian.applayout.floor;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v4.app.NavUtils;
import android.support.v7.app.ActionBar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.MenuItem;
import android.view.View;

import com.example.ian.applayout.R;
import com.example.ian.applayout.UpdateOrderStatus;
import com.example.ian.applayout.floor.contentLists.OrderReceived;

/**
 * Created by Finn on 08/03/2017.
 */

public class ReceivedDetailActivity extends AppCompatActivity {

    public static int totalNum = 0;
    public static String itemName ;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_received_detail);
        Toolbar toolbar = (Toolbar) findViewById(R.id.received_detail_toolbar);
        setSupportActionBar(toolbar);

        // Show the Up button in the action bar.
        ActionBar actionBar = getSupportActionBar();
        if (actionBar != null) {
            actionBar.setDisplayHomeAsUpEnabled(true);
        }

        //Little green plus button to add menu items to the order.
        FloatingActionButton removeOrderBtn = (FloatingActionButton) findViewById(R.id.fabThree);
        removeOrderBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                itemName =  new ReceivedListActivity().receivedNamer;
                Snackbar.make(view, "Your Order Has Been Removed!", Snackbar.LENGTH_LONG)
                        .setAction("Action", null).show();

                //Remove order from OrderList
                String itemPosition = getIntent().getStringExtra(ReceivedDetailFragment.ARG_ITEM_ID);

                //Update orderstaus on database
                String orderNumber = OrderReceived.ITEMS_RECEIVED.get(Integer.parseInt(itemPosition)).content;

                //Access userInfo.
                SharedPreferences settings = getSharedPreferences("LogInInfo",0);
                String username = settings.getString("email","could not find email");
                String password = settings.getString("password","could not find password");
                new UpdateOrderStatus(username,password,orderNumber,Integer.parseInt(itemPosition),ReceivedDetailActivity.this).execute();

                Intent goBack = new Intent(ReceivedDetailActivity.this,DrawerActivity.class);
                startActivity(goBack);
                finish();

            }
        });


        // savedInstanceState is non-null when there is fragment state
        // saved from previous configurations of this activity
        // (e.g. when rotating the screen from portrait to landscape).
        // In this case, the fragment will automatically be re-added
        // to its container so we don't need to manually add it.
        if (savedInstanceState == null) {
            // Create the detail fragment and add it to the activity
            // using a fragment transaction.
            Bundle arguments = new Bundle();
            arguments.putString(ReceivedDetailFragment.ARG_ITEM_ID,
                    getIntent().getStringExtra(ReceivedDetailFragment.ARG_ITEM_ID));
            ReceivedDetailFragment fragment = new ReceivedDetailFragment();
            fragment.setArguments(arguments);
            getSupportFragmentManager().beginTransaction()
                    .add(R.id.received_detail_container, fragment).commit();
        }
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        int id = item.getItemId();
        if (id == android.R.id.home) {
            // This ID represents the Home or Up button. In the case of this
            // activity, the Up button is shown. Use NavUtils to allow users
            // to navigate up one level in the application structure.
            NavUtils.navigateUpTo(this, new Intent(this, ReceivedListActivity.class));
            return true;
        }
        return super.onOptionsItemSelected(item);
    }

}
