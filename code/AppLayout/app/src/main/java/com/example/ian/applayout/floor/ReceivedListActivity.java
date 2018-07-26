package com.example.ian.applayout.floor;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.RecyclerView;
import android.support.v7.widget.Toolbar;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.example.ian.applayout.R;
import com.example.ian.applayout.RecieveOrders;
import com.example.ian.applayout.floor.contentLists.OrderReceived;
import com.example.ian.applayout.floor.contentLists.OrderReceived.ItemMenu;

import java.util.List;

/**
 * This is the Activity that handles Populating a list of received orders.
 */

public class ReceivedListActivity extends AppCompatActivity {

    private boolean oTwoPane;
    public static String receivedNamer;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_item_received);

        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        toolbar.setTitle(getTitle());

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

    @Override
    public void onBackPressed() {
        ReceivedListActivity.this.finish();
    }

    private void setupRecyclerView(@NonNull RecyclerView recyclerView) {
        recyclerView.setAdapter(new SimpleItemRecyclerViewAdapter(OrderReceived.ITEMS_RECEIVED));
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
        public void onBindViewHolder(final ReceivedListActivity.SimpleItemRecyclerViewAdapter.ViewHolder holder, final int position) {
            holder.oItem = oValues.get(position);
            holder.oIdView.setText(oValues.get(position).id);
            holder.oContentView.setText(oValues.get(position).content);

            holder.oView.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    if (oTwoPane) {
                        Bundle arguments = new Bundle();
                        arguments.putString(ReceivedDetailFragment.ARG_ITEM_ID, holder.oItem.id);
                        ReceivedDetailFragment fragment = new ReceivedDetailFragment();
                        fragment.setArguments(arguments);
                        getSupportFragmentManager().beginTransaction().replace(R.id.received_detail_container, fragment).commit();
                    } else {
                        Context context = v.getContext();
                        Intent intent = new Intent(context, ReceivedDetailActivity.class);
                        intent.putExtra(ReceivedDetailFragment.ARG_ITEM_ID, holder.oItem.id);
                        receivedNamer = oValues.get(position).content;
                        context.startActivity(intent);
                    }
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
