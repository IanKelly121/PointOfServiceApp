package com.example.ian.applayout.floor;

import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.example.ian.applayout.R;
import com.example.ian.applayout.floor.contentLists.OrderTotal;

/**
 * Fragment for Total List activity
 */

public class TotalListFragment extends Fragment {
    private RecyclerView oRecycleView;
    private TotalRecyclerViewAdapter oTotalRecyclerViewAdapter;

    public TotalListFragment() {
        // Required empty public constructor
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_total_list, container, false);
        oRecycleView = (RecyclerView)view.findViewById(R.id.item_list);
        oTotalRecyclerViewAdapter = new TotalRecyclerViewAdapter(getActivity(), OrderTotal.ITEMS_MENU);
        oRecycleView.setAdapter(oTotalRecyclerViewAdapter);
        return view;
    }
}
