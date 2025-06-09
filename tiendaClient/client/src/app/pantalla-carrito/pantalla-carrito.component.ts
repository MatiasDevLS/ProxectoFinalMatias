import { Component, OnInit, SimpleChanges } from '@angular/core';
import { Producto } from '../Models/Producto';
import { ProductosService } from '../services/ProductoService/productos.service';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';
import { MatDialog, MatDialogModule } from '@angular/material/dialog';
import { ModalCompraComponent } from '../modal-compra/modal-compra.component';
import { Dialog, DialogRef } from '@angular/cdk/dialog';

@Component({
  selector: 'app-pantalla-carrito',
  imports: [FormsModule,CommonModule, MatDialogModule ],
  templateUrl: './pantalla-carrito.component.html',
  styleUrl: './pantalla-carrito.component.scss'
})
export class PantallaCarritoComponent implements OnInit {
  productos: Producto[] = []
  size: number = 0;
  cantidadSeleccionada: number = 1;
  total: number = 0;
  pantallaError:boolean = false
  

  constructor(private productosService: ProductosService, private dialog:MatDialog) {

  }

  ngOnInit(): void {
    var keys: string = localStorage.getItem('keysCarrito')!
    if (keys != null && keys != '') {
      keys = JSON.stringify(keys)
      keys = keys.replace('"', '')
      keys = keys.replace('"', '')

      let arrayKeys = keys.split(',')
      console.log(arrayKeys)
      this.size = arrayKeys.length
      arrayKeys.forEach((key: string) => {
        this.productosService.getProducto(key).subscribe({
          next: (producto: Producto) => {
            producto.cantidad = 5
            this.total += Number(producto.precio!) * producto.cantidad
            this.productos.push(producto)
          }
        })
      });
      
    }
    else this.pantallaError = true

  }

  // Use ngOnChanges to recalculate total if productos or their quantities change
  ngOnChanges(changes: SimpleChanges): void {
    if (changes['productos']) {
      this.calculateTotal();
    }
  }

  calculateTotal(): void {
    this.total = this.productos.reduce((sum, producto) => {
      return sum + (producto.precio! * producto.cantidad!);
    }, 0);
  }

  onQuantityChange(): void {
    this.calculateTotal();
  }

  formatearNumero(input: string, decimales: number = 2): string {
    // Eliminar comas inglesas (separadores de miles)
    const sinComas = input.replace(/,/g, '');

    // Convertir a número flotante
    const numero = parseFloat(sinComas);

    // Validar si es un número válido
    if (isNaN(numero)) {
      console.warn('Valor inválido:', input);
      return '';
    }

    // Formatear al estilo español
    return numero.toLocaleString('es-ES', {
      minimumFractionDigits: decimales,
      maximumFractionDigits: decimales,
    });
  }

  eliminarCarrito(id: number) {

    var ids: any = window.localStorage.getItem('keysCarrito')?.split(',')

    console.log("ids " + ids)
    var nuevoCarrito: any = []

    ids.forEach((idF: number) => {
      if (idF != id) {
        nuevoCarrito.push(idF.toString())
      }
    });


    if (nuevoCarrito.length >0)
    window.localStorage.setItem('keysCarrito', nuevoCarrito.toString())
    else window.localStorage.removeItem('keysCarrito')
    window.location.reload()



  }

  pagar(){
    console.log(this.total)
    let dialogRef = this.dialog.open(ModalCompraComponent, {
  height: 'auto',
  width: '50%',
  data: { totalPagar: this.total }
  
    });
  }


}
