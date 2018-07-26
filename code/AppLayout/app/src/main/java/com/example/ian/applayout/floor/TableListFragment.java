package com.example.ian.applayout.floor;

import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.example.ian.applayout.R;
import com.example.ian.applayout.floor.contentLists.OrderTables;

/**
 * Fragment for table list activity.
 */

public class TableListFragment extends Fragment {

    private RecyclerView nRecycleView;
    private TableRecyclerViewAdapter nTableRecyclerViewAdapter;

    public TableListFragment() {
        // Required empty public constructor
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_tables_list, container, false);
        nRecycleView = (RecyclerView)view.findViewById(R.id.item_list);
        nTableRecyclerViewAdapter = new TableRecyclerViewAdapter(getActivity(), OrderTables.ITEMS_TABLES);
        nRecycleView.setAdapter(nTableRecyclerViewAdapter);

        return view;
    }

}
