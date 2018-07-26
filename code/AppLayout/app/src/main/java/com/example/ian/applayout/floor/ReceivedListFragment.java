package com.example.ian.applayout.floor;

import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.example.ian.applayout.R;
import com.example.ian.applayout.floor.contentLists.OrderReceived;

/**
 * Fragment for Received List
 */

public class ReceivedListFragment extends Fragment {

    private RecyclerView oRecycleView;
    private ReceivedRecyclerViewAdapter oReceivedRecyclerViewAdapter;

    public ReceivedListFragment() {
        // Required empty public constructor
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_received_list, container, false);
        oRecycleView = (RecyclerView)view.findViewById(R.id.item_list);
        oReceivedRecyclerViewAdapter = new ReceivedRecyclerViewAdapter(getActivity(), OrderReceived.ITEMS_RECEIVED);
        oRecycleView.setAdapter(oReceivedRecyclerViewAdapter);

        return view;
    }
}
