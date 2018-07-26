package com.example.ian.applayout.floor;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.example.ian.applayout.R;
import com.example.ian.applayout.floor.contentLists.OrderMenu.MenuItem;

import java.util.List;

public class MenuRecyclerViewAdapter extends RecyclerView.Adapter<MenuRecyclerViewAdapter.ViewHolder> {

    private final List<MenuItem> mValues;
    private Context context;

    public MenuRecyclerViewAdapter(Context context, List<MenuItem> items) {
        this.context = context;
        mValues = items;
    }

    @Override
    public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.item_list_content, parent, false);
        return new ViewHolder(view);
    }

    @Override
    public void onBindViewHolder(final ViewHolder holder, int position) {
        holder.mItem = mValues.get(position);
        holder.mIdView.setText(mValues.get(position).id);
        holder.mContentView.setText(mValues.get(position).content);

        holder.mView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if(!DrawerActivity.mTwoPane){
                    Context context = v.getContext();
                    Intent intent = new Intent(context, MenuDetailActivity.class);
                    intent.putExtra(MenuDetailFragment.ARG_ITEM_ID, holder.mItem.id);
                    context.startActivity(intent);
                }else {
                    Bundle arguments = new Bundle();
                    arguments.putString(MenuDetailFragment.ARG_ITEM_ID, holder.mItem.id);
                    MenuDetailFragment fragment = new MenuDetailFragment();
                    fragment.setArguments(arguments);
                    ((DrawerActivity)context).getSupportFragmentManager().beginTransaction().replace(R.id.received_detail_container, fragment).commit();
                }
            }
        });
    }

    @Override
    public int getItemCount() {
        return mValues.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {
        public final View mView;
        public final TextView mIdView;
        public final TextView mContentView;
        public MenuItem mItem;

        public ViewHolder(View view) {
            super(view);
            mView = view;
            mIdView = (TextView) view.findViewById(R.id.id);
            mContentView = (TextView) view.findViewById(R.id.content);
        }

        @Override
        public String toString() {
            return super.toString() + " '" + mContentView.getText() + "'";
        }
    }
}