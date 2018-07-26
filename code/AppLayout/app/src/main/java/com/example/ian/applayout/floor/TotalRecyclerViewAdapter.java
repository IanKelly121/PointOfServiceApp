package com.example.ian.applayout.floor;

import android.content.Context;
import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.example.ian.applayout.R;
import com.example.ian.applayout.floor.contentLists.OrderTotal.ItemMenu;

import java.util.List;

/**
 * View adapter for total order.
 */

public class TotalRecyclerViewAdapter extends RecyclerView.Adapter<TotalRecyclerViewAdapter.ViewHolder> {
    private final List<ItemMenu> oValues;
    private Context context;

    public TotalRecyclerViewAdapter(Context context, List<ItemMenu> items) {
        this.context = context;
        oValues = items;
    }

    @Override
    public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.item_list_content, parent, false);
        return new ViewHolder(view);
    }

    @Override
    public void onBindViewHolder(final ViewHolder holder,final int position) {
        holder.oItem = oValues.get(position);
        holder.oIdView.setText(oValues.get(position).id);
        holder.oContentView.setText(oValues.get(position).content);

        holder.oView.setOnClickListener(new View.OnClickListener() {
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
