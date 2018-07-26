package com.example.ian.applayout.floor;

import android.content.Intent;
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

import static com.example.ian.applayout.floor.contentLists.OrderTotal.addItemTotal;
import static com.example.ian.applayout.floor.contentLists.OrderTotal.createOrderTotalItem;

/**
 * An activity representing a single Item detail screen. This
 * activity is only used narrow width devices. On tablet-size devices,
 * item details are presented side-by-side with a list of items
 * in a {@link MenuListActivity}.
 */
public class MenuDetailActivity extends AppCompatActivity {

    public static int totalNum = 0;
    public static String itemName ;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_item_detail);
        Toolbar toolbar = (Toolbar) findViewById(R.id.detail_toolbar);
        setSupportActionBar(toolbar);

        // Show the Up button in the action bar.
        ActionBar actionBar = getSupportActionBar();
        if (actionBar != null) {
            actionBar.setDisplayHomeAsUpEnabled(true);
        }

        //Little green plus button to add menu items to the order.
        FloatingActionButton fab = (FloatingActionButton) findViewById(R.id.fab);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                itemName =  new MenuListActivity().itemNamer;
                Snackbar.make(view, "Item added to order!", Snackbar.LENGTH_LONG)
                        .setAction("Action", null).show();

                addItemTotal(createOrderTotalItem(totalNum, itemName));
                totalNum++;
                new MenuListActivity().itemNamer = "";
                itemName =  new MenuListActivity().itemNamer;

                Intent goBack = new Intent(MenuDetailActivity.this,MenuListActivity.class);
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
            arguments.putString(MenuDetailFragment.ARG_ITEM_ID,
                    getIntent().getStringExtra(MenuDetailFragment.ARG_ITEM_ID));
            MenuDetailFragment fragment = new MenuDetailFragment();
            fragment.setArguments(arguments);
            getSupportFragmentManager().beginTransaction()
                    .add(R.id.menu_detail_container, fragment)
                    .commit();
        }
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        int id = item.getItemId();
        if (id == android.R.id.home) {
            // This ID represents the Home or Up button. In the case of this
            // activity, the Up button is shown. Use NavUtils to allow users
            // to navigate up one level in the application structure.
            NavUtils.navigateUpTo(this, new Intent(this, MenuListActivity.class));
            return true;
        }
        return super.onOptionsItemSelected(item);
    }
}
