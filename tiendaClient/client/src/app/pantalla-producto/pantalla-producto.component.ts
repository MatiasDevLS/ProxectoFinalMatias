import { Component, Input, OnInit } from '@angular/core';
import { ProductosService } from '../services/ProductoService/productos.service';
import { ActivatedRoute, Router, RouterModule } from '@angular/router';
import { CartaProductoComponent } from '../carta-producto/carta-producto.component';
import { MatSnackBar, MatSnackBarModule } from '@angular/material/snack-bar';
import { TiposService } from '../services/TiposService/tipos.service';

@Component({
  selector: 'app-pantalla-producto',
  imports: [CartaProductoComponent, MatSnackBarModule, RouterModule],
  templateUrl: './pantalla-producto.component.html',
  styleUrl: './pantalla-producto.component.scss'
})
export class PantallaProductoComponent implements OnInit {
  producto!: any
  productosAleatorios!: any[]
  tipo!: any

  constructor(public productosService: ProductosService, public tiposService: TiposService, private route: ActivatedRoute, private snackBar: MatSnackBar, private router: Router) { }

  // Se obtienen: el producto a partir de la id, el tipo a partir de la idTipo del producto y 4 productos aleatorios para las tarjetas
  ngOnInit(): void {
    let productoId = this.route.snapshot.paramMap.get('id');
    this.productosService.getProducto(productoId!).subscribe({
      next: (respond: any) => {
        this.producto = respond
        this.tiposService.getTipo(respond.id).subscribe({
          next: (valor: any) => this.tipo = valor
        })
      }
    });
    this.productosService.getProductosAleatorios(productoId!).subscribe({
      next: (respond: any) => this.productosAleatorios = respond
    });
  }

  // Añade al carrito si no existe en el
  addCarrito(id: number) {
    this.confirmarCarrito()
    if (window.localStorage.getItem('keysCarrito') != null) {
      var ids: any = window.localStorage.getItem('keysCarrito')?.split(',')
      if (ids.includes(id.toString())) return;
      ids?.push(id.toString())
      ids = ids?.toString()
      window.localStorage.setItem('keysCarrito', ids.toString())
    }
    else
      window.localStorage.setItem('keysCarrito', id.toString())
  }

  // Añade al carrito el producto si no existe en el y mueve al usuario al carrito
  comprar(id: number) {
    if (window.localStorage.getItem('keysCarrito') != null) {
      var ids: any = window.localStorage.getItem('keysCarrito')?.split(',')
      if (!ids.includes(id.toString())) {
        ids?.push(id.toString())
        ids = ids?.toString()
        window.localStorage.setItem('keysCarrito', ids.toString())
      }

    }
    else {
      window.localStorage.setItem('keysCarrito', id.toString())
      console.log("hola")
    }
    this.router.navigateByUrl('/carrito');
  }


  // Activa el mensaje de añadido al carrito
  confirmarCarrito() {
    this.snackBar.open('Producto añadido al carrito', 'Cerrar', {
      duration: 3000, // Duración en milisegundos (3 segundos)
      horizontalPosition: 'center', // Posición horizontal (start, center, end, left, right)
      verticalPosition: 'bottom',  // Posición vertical (top, bottom)
    });
  }
}
