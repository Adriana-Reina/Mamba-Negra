package com.example.loginapp;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

public class MainActivity extends AppCompatActivity {

    private EditText etCorreoElectronico;
    private EditText etContrasena;
    private Button btnEnviar;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        etCorreoElectronico = findViewById(R.id.et_correo_electronico);
        etContrasena = findViewById(R.id.et_contrasena);
        btnEnviar = findViewById(R.id.btn_enviar);

        btnEnviar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (!etCorreoElectronico.getText().toString().trim().isEmpty() && !etContrasena.getText().toString().trim().isEmpty()) {
                    Toast.makeText(MainActivity.this, "Enviando Solicitud", Toast.LENGTH_SHORT).show();
                    // Add your PHP script call here to process the login request
                } else {
                    Toast.makeText(MainActivity.this, "Debes llenar todos los campos", Toast.LENGTH_SHORT).show();
                }
            }
        });
    }
}