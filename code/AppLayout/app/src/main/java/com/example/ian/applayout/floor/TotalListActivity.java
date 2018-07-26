package com.example.ian.applayout.floor;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.RecyclerView;
import android.support.v7.widget.Toolbar;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.example.ian.applayout.R;
import com.example.ian.applayout.SendOrder;
import com.example.ian.applayout.floor.contentLists.OrderTotal;
import com.example.ian.applayout.floor.contentLists.OrderTotal.ItemMenu;

import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.List;

/**
 * List activity to handle the current list of menu items due to be sent.
 */

public class TotalListActivity extends AppCompatActivity {
    private boolean oTwoPane;
    public static int totalNum = 0;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_item_total_list);

        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        toolbar.setTitle(getTitle());

        FloatingActionButton fab = (FloatingActionButton) findViewById(R.id.fabTwo);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Snackbar.make(view, "Your Order Has Been Sent!", Snackbar.LENGTH_LONG)
                        .setAction("Action", null).show();

                // Send Order.
                SharedPreferences settings = getSharedPreferences("LogInInfo",0);
                String username = settings.getString("email","could not find email");
                String password = settings.getString("password","could not find password");
                String orderNumber = new SimpleDateFormat("ddMMyyyyhhmmss").format(new Date());
                String orderDetails = new OrderTotal().getOrderDetails(OrderTotal.ITEMS_MENU);

                new SendOrder(TotalListActivity.this,username,password,orderNumber,orderDetails,"").execute();

                // Clear Order List and return to menu list.
                OrderTotal.ITEMS_MENU.clear();
                Intent moveBackToMenu = new Intent(TotalListActivity.this,MenuListActivity.class);
                startActivity(moveBackToMenu);
            }
        });

        View recyclerView = findViewById(R.id.item_list);
        assert recyclerView != null;
        setupRecyclerView((RecyclerView) recyclerView);

        if (findViewById(R.id.received_detail_container) != null) {
            // The detail container view will be present only in the
            // large-screen layouts (res/values-w900dp).
            // If this view is present, then the
            // activity should be in two-pane mode.
            oTwoPane = true;
        }
    }

    private void setupRecyclerView(@NonNull RecyclerView recyclerView) {
        recyclerView.setAdapter(new SimpleItemRecyclerViewAdapter(OrderTotal.ITEMS_MENU));
    }

    public class SimpleItemRecyclerViewAdapter extends RecyclerView.Adapter<SimpleItemRecyclerViewAdapter.ViewHolder> {

        private final List<ItemMenu> oValues;

        public SimpleItemRecyclerViewAdapter(List<ItemMenu> items) {
            oValues = items;
        }

        @Override
        public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
            View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.item_list_content, parent, false);
            return new ViewHolder(view);
        }

        @Override
        public void onBindViewHolder(final ViewHolder holder, int position) {
            holder.oItem = oValues.get(position);
            holder.oIdView.setText(oValues.get(position).id);
            holder.oContentView.setText(oValues.get(position).content);

            holder.oView.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {

                }
            });
        }

        @Override
        public int getItemCount() {
            return oValues.size();
        }

        public class ViewHolder extends RecyclerView.ViewHolder {
            public final View oView;
            public final TextView oIdView;
            public final TextView oContentView;
            public ItemMenu oItem;

            public ViewHolder(View view) {
                super(view);
                oView = view;
                oIdView = (TextView) view.findViewById(R.id.id);
                oContentView = (TextView) view.findViewById(R.id.content);
            }

            @Override
            public String toString() {
                return super.toString() + " '" + oContentView.getText() + "'";
            }
        }
    }
}
