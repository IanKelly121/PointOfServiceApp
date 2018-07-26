package com.example.ian.applayout.floor;

import android.content.Intent;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;

import com.example.ian.applayout.R;


/**
 * Default fragment is the home screen fragment that holds the two large buttons.
 */
public class DefaultFragment extends Fragment {


    public DefaultFragment() {
        // Required empty public constructor
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view = inflater.inflate(R.layout.fragment_default, container, false);

        Button createOrderHomeBtn = (Button) view.findViewById(R.id.create_Order_btn);
        createOrderHomeBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent nextActivity = new Intent(getActivity(),TableListActivity.class);
                startActivity(nextActivity);
            }
        });

        Button viewOrderHomeBtn = (Button) view.findViewById(R.id.view_order);
        viewOrderHomeBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent nextActivity = new Intent(getActivity(),ReceivedListActivity.class);
                startActivity(nextActivity);
            }
        });

        return view;
    }

}
