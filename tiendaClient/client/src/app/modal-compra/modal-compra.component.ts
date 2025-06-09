import { CommonModule } from '@angular/common';
import { Component, Inject } from '@angular/core';
import { FormControl, FormGroup, ReactiveFormsModule, Validators } from '@angular/forms';
import { MAT_DIALOG_DATA, MatDialogModule } from '@angular/material/dialog';
import { MatIconModule } from '@angular/material/icon';
import { MatProgressSpinnerModule } from '@angular/material/progress-spinner';

@Component({
  selector: 'app-modal-compra',
  imports: [CommonModule,MatDialogModule, ReactiveFormsModule,MatProgressSpinnerModule, MatIconModule],
  templateUrl: './modal-compra.component.html',
  styleUrl: './modal-compra.component.scss'
})
export class ModalCompraComponent {
  confirmarEstado:boolean = false
  formGroup:FormGroup = new FormGroup ({
    tarjeta: new FormControl('',Validators.required),
    fecha: new FormControl('',Validators.required),
    cvv: new FormControl('',Validators.required),
    nombre: new FormControl('',Validators.required)
  })
  cargando:boolean = false
  mensajeFinalizado:boolean = false
  datos:any
  constructor( @Inject(MAT_DIALOG_DATA) public data: any){}
  confirmar(){

    this.datos = this.formGroup.value
    this.confirmarEstado = !this.confirmarEstado
  }

  comprar(){
    this.cargando = true; // Oculta el símbolo de carga
    window.localStorage.clear()
    setTimeout(() => {
      this.mensajeFinalizado = true; // Muestra el mensaje de finalizado
    }, 3000); // 3 segundos
  }
}
