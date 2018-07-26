package com.example.ian.applayout.floor;


import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.example.ian.applayout.R;
import com.example.ian.applayout.floor.contentLists.OrderMenu;


/**
 * A simple {@link Fragment} subclass.
 */
public class MenuListFragment extends Fragment {

    private RecyclerView mRecycleView;
    private MenuRecyclerViewAdapter mMenuRecyclerViewAdapter;

    public MenuListFragment() {
        // Required empty public constructor
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_menu_list, container, false);
        mRecycleView = (RecyclerView)view.findViewById(R.id.item_list);
        mMenuRecyclerViewAdapter = new MenuRecyclerViewAdapter(getActivity(), OrderMenu.ITEMS);
        mRecycleView.setAdapter(mMenuRecyclerViewAdapter);
        return view;
    }

}
