package com.example.ian.applayout.floor;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.design.widget.NavigationView;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;

import com.example.ian.applayout.LoginActivity;
import com.example.ian.applayout.MenuGetter;
import com.example.ian.applayout.R;
import com.example.ian.applayout.RecieveOrders;
import com.example.ian.applayout.floor.contentLists.OrderReceived;

/**
 * The main activity to run all the menu items in the drawer.
 */

public class DrawerActivity extends AppCompatActivity implements NavigationView.OnNavigationItemSelectedListener {

    //Boolean for if the screen is rotated.
    public static boolean mTwoPane;

    private String username,password;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_drawer);

        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.setDrawerListener(toggle);
        toggle.syncState();

        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setCheckedItem(R.id.create_order);
        navigationView.setNavigationItemSelectedListener(this);

        //Access userInfo.
        SharedPreferences settings = getSharedPreferences("LogInInfo",0);
        username = settings.getString("email","could not find email");
        password = settings.getString("password","could not find password");

        new RecieveOrders(username, password).execute();


        if (findViewById(R.id.received_detail_container) != null) {
            // The detail container view will be present only in the
            // large-screen layouts (res/values-w900dp).
            // If this view is present, then the
            // activity should be in two-pane mode.
            mTwoPane = true;
        }

        //Load the two big buttons from Default Fragment.
        final FragmentManager fragmentManager = getSupportFragmentManager();
        DefaultFragment fragment = new DefaultFragment();
        fragmentManager.beginTransaction().replace(R.id.first_container, fragment).commit();
    }

    @Override
    public void onBackPressed() {
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        if (drawer.isDrawerOpen(GravityCompat.START)) {
            drawer.closeDrawer(GravityCompat.START);
        } else {
            super.onBackPressed();
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {

        int id = item.getItemId();

        //If sync button is pressed, refresh the menu and the incoming orders.
        if (id == R.id.action_sync) {
            //Sync menu with database.
            new MenuGetter(username,password).execute();

            //Check for any new OPEN orders.
            new RecieveOrders(username,password).execute();
            return true;
        }

        //If logout button is pressed, return to login screen.
        if (id == R.id.action_log_off) {
            Intent nextActivity = new Intent(DrawerActivity.this, LoginActivity.class);
            startActivity(nextActivity);
            return true;
        }

        return super.onOptionsItemSelected(item);
    }

    @SuppressWarnings("StatementWithEmptyBody")
    @Override
    public boolean onNavigationItemSelected(MenuItem item) {
        // Handle navigation view item clicks here.
        int id = item.getItemId();

        Fragment fragment = null;
        FragmentManager fragmentManager = getSupportFragmentManager();

        if (id == R.id.create_order) {
            Intent nextActivity = new Intent(DrawerActivity.this, TableListActivity.class);
            startActivity(nextActivity);
            fragment = new TableListFragment();
            fragmentManager.beginTransaction().replace(R.id.first_container, fragment).commit();

        } else if (id == R.id.view_menu) {
            Intent nextActivity = new Intent(DrawerActivity.this, MenuListActivity.class);
            startActivity(nextActivity);
            fragment = new MenuListFragment();
            fragmentManager.beginTransaction().replace(R.id.first_container, fragment).commit();

        } else if (id == R.id.view_total_order) {
            Intent nextActivity = new Intent(DrawerActivity.this, TotalListActivity.class);
            startActivity(nextActivity);
            fragment = new TotalListFragment();
            fragmentManager.beginTransaction().replace(R.id.first_container, fragment).commit();

        } else if (id == R.id.done_order) {
            Intent nextActivity = new Intent(DrawerActivity.this, ReceivedListActivity.class);
            startActivity(nextActivity);
            fragment = new ReceivedListFragment();
            fragmentManager.beginTransaction().replace(R.id.first_container, fragment).commit();
        }

        return true;
    }

}
