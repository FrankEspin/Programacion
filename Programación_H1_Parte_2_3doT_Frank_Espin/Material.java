package Programación_H1_Parte_2_3doT_Frank_Espin;

import java.util.ArrayList;
import java.util.Scanner;


abstract class Material {
    protected String codigo;
    protected String titulo;

    public Material(String codigo, String titulo) {
        this.codigo = codigo;
        this.titulo = titulo;
    }

    public String getCodigo() {
        return codigo;
    }

    public String getTitulo() {
        return titulo;
    }
}
