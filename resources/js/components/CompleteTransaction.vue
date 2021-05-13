<template>
    <div class="row">
        <div class="mx-auto col-lg-8 col-sm-6 col-sm-12 col-xs-12">
            <div class="card m-4">
                <div class="card-header">
                   <h4>Transaction Successful</h4>
                </div>

                 <div class="card-body">
                     <table class="table table-bordered table-hover">
                         <tbody>
                             <tr>
                                 <td>Amount</td>
                                 <td>{{transaction.amount}}</td>
                             </tr>
                               <tr>
                                 <td>Status</td>
                                 <td>Successful</td>
                             </tr>
                             <tr>
                                 <td>Payment type</td>
                                 <td>Deposit</td>
                             </tr>
                              <tr>
                                 <td>Transaction reference</td>
                                 <td>{{transaction.tx_ref}}</td>
                             </tr>
                             <tr>
                                 <td>Transaction ID</td>
                                 <td>{{transaction.transaction_id}}</td>
                             </tr>
                         </tbody>
                     </table>
                    <div class="text-center m-4"><a href="/dashboard">Go back</a></div>
                 </div>
            </div>

        </div>
    </div>
</template>
<script>
    export default({
        props:{
            transaction:{
                type: Object
            }
        },
        data() {
            return {

            }
        },
    })
</script>
