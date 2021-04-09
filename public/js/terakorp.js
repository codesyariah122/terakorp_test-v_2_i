new Vue({
	el: '#app',
	data(){
		return {
			title: {
				rs: 'Data Rumahsakit',
				ps: 'Data Pasien'
			},
			no: parseInt(1),
			hospitals: [],
			pasiens: []
		}
	}, 

	mounted(){
		this.getRumahsakitData(),
		this.getPasienData()
	},

	methods: {
		getRumahsakitData(){
			axios.get('/rumahsakit/show')
			.then(res => {
				this.hospitals = res.data
				const length = this.hospitals.length * 100
				this.no = this.no - length 
			})
			.catch(err => console.log(err.message))
		},

		DeleteRumahSakit(id){
			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.isConfirmed) {
					axios.delete(`/rumahsakit/destroy/${id}`)
					.then(response => {
						let i = this.hospitals.map(data => data.id).indexOf(id);
						this.hospitals.splice(i, 1)
						console.log(this.hospitals.length)
						const length = (this.hospitals.length * 100) - 1 - 2
						console.log(length)
						this.no =( this.no - length) - this.hospitals.length - 4
					})
					.catch(err => console.log(err.message))
					Swal.fire(
						'Deleted!',
						'Your file has been deleted.',
						'success'
						)
				}
			})
			
		},

		getPasienData(){
			axios.get('/pasien/show/all')
			.then(res => {
				this.pasiens = res.data
				// const length = this.pasiens.length * 100
				// console.log(length)
				// this.no = this.no - length 
			})
			.catch(err => console.log(err.message))
		},

		DeletePasien(id){
			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.isConfirmed) {
					axios.delete(`/pasien/destroy/${id}`)
					.then(response => {
						let i = this.pasiens.map(data => data.id).indexOf(id);
						this.pasiens.splice(i, 1)
					})
					.catch(err => console.log(err.message))
					Swal.fire(
						'Deleted!',
						'Your file has been deleted.',
						'success'
						)
				}
			})
			
		},

	}

})