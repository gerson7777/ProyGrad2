package com.example.abyte.citec;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;

public class registroNotas extends AppCompatActivity {
    String url="http://192.168.0.109:80/CITEC/movil/";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_registro_notas);

        WebView web= (WebView) findViewById(R.id.wVisor);
        web.setWebViewClient(new MyWebViewClient());
        WebSettings settings = web.getSettings();
        settings.setJavaScriptEnabled(true);
        web.loadUrl(url);
    }

    private  class   MyWebViewClient extends WebViewClient {
        public  boolean  shouldOverrideUrlLoading(WebView view, String url){
            view.loadUrl(url);
            return  true;
        }
    }
}
