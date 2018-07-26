package com.example.ian.applayout.floor;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.design.widget.FloatingActionButton;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.RecyclerView;
import android.support.v7.widget.Toolbar;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.example.ian.applayout.R;
import com.example.ian.applayout.RecieveOrders;
import com.example.ian.applayout.floor.contentLists.OrderTables;
import com.example.ian.applayout.floor.contentLists.OrderTables.ItemTables;

import java.util.List;

/**
 * Class to represent and handle the List of tables.
 */

public class TableListActivity extends AppCompatActivity {

    /**
     * Whether or not the activity is in two-pane mode, i.e. running on a tablet
     * device.
     */
    private boolean mTwoPane;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_item_list);

        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        toolbar.setTitle(getTitle());

        FloatingActionButton fab = (FloatingActionButton) findViewById(R.id.fab);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                    Intent nextActivity = new Intent(TableListActivity.this, TotalListActivity.class);
                    startActivity(nextActivity);
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
            mTwoPane = true;
        }
    }

    //Update the recieved orders list with new order
    @Override
    protected void onPause(){
        super.onPause();
        //Access userInfo.
        SharedPreferences settings = getSharedPreferences("LogInInfo",0);
        String username = settings.getString("email","could not find email");
        String password = settings.getString("password","could not find password");

        new RecieveOrders(username, password).execute();
        View recyclerView = findViewById(R.id.item_list);
        assert recyclerView != null;
        setupRecyclerView((RecyclerView) recyclerView);
    }


    private void setupRecyclerView(@NonNull RecyclerView recyclerView) {
        recyclerView.setAdapter(new SimpleItemRecyclerViewAdapter(OrderTables.ITEMS_TABLES));
    }

    public class SimpleItemRecyclerViewAdapter extends RecyclerView.Adapter<SimpleItemRecyclerViewAdapter.ViewHolder> {

        private final List<ItemTables> nValues;

        public SimpleItemRecyclerViewAdapter(List<ItemTables> items) {
            nValues = items;
        }

        @Override
        public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
            View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.item_list_content, parent, false);
            return new ViewHolder(view);
        }

        @Override
        public void onBindViewHolder(final ViewHolder holder, int position) {
            holder.nItem = nValues.get(position);
            holder.nIdView.setText(nValues.get(position).id);
            holder.nContentView.setText(nValues.get(position).content);

            holder.nView.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    Context context = v.getContext();
                    Intent intent = new Intent(context, MenuListActivity.class);

                    context.startActivity(intent);
                }
            });
        }

        @Override
        public int getItemCount() {
            return nValues.size();
        }

        public class ViewHolder extends RecyclerView.ViewHolder {
            public final View nView;
            public final TextView nIdView;
            public final TextView nContentView;
            public ItemTables nItem;

            public ViewHolder(View view) {
                super(view);
                nView = view;
                nIdView = (TextView) view.findViewById(R.id.id);
                nContentView = (TextView) view.findViewById(R.id.content);
            }

            @Override
            public String toString() {
                return super.toString() + " '" + nContentView.getText() + "'";
            }
        }
    }
}
